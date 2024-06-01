<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Post as PostModel;
use Livewire\Attributes\Layout;
use App\Jobs\PublishPost;
use App\Notifications\DemoNotification;

class Post extends Component
{
    public $isActive = false;

    public function mount()
    {
        $this->isActive = request()->routeIs('post');
    }

    public $posts, $title, $description, $postId, $updatePostMode = false, $addPostMode = false;

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'title' => 'required',
        'description' => 'required'
    ];
 
    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields(){
        $this->title = '';
        $this->description = '';
    }
 
    #[Layout('components.layouts.bootstrap')] 
    public function render()
    {
        $this->posts = PostModel::orderBy('id')->get();
        return view('livewire.posts.post');
    }
 
    /**
     * Open Add Post form
     * @return void
     */
    public function addPost()
    {
        $this->resetFields();
        $this->addPostMode = true;
        $this->updatePostMode = false;
    }
     /**
      * store the user inputted post data in the posts table
      * @return void
      */
    public function storePost()
    {
        $this->validate();
        try {
            PostModel::create([
                'title' => $this->title,
                'description' => $this->description
            ]);
            session()->flash('success','Post Created Successfully!!');
            $this->resetFields();
            $this->addPostMode = false;
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
 
    /**
     * show existing post data in edit post form
     * @param mixed $id
     * @return void
     */
    public function editPost($id){
        try {
            $post = PostModel::findOrFail($id);
            if( !$post) {
                session()->flash('error','Post not found');
            } else {
                $this->title = $post->title;
                $this->description = $post->description;
                $this->postId = $post->id;
                $this->updatePostMode = true;
                $this->addPostMode = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
 
    }

    public function publishPost($id)
    {
        $post = PostModel::findOrFail($id);
        PublishPost::dispatch($post);
    }

    public function demoNotify()
    {
        auth()->user()->notify(new DemoNotification());
    }
 
    /**
     * update the post data
     * @return void
     */
    public function updatePost()
    {
        $this->validate();
        try {
            PostModel::whereId($this->postId)->update([
                'title' => $this->title,
                'description' => $this->description
            ]);
            session()->flash('success','Post Updated Successfully!!');
            $this->resetFields();
            $this->updatePostMode = false;
        } catch (\Exception $ex) {
            session()->flash('success','Something goes wrong!!');
        }
    }
 
    /**
     * Cancel Add/Edit form and redirect to post listing page
     * @return void
     */
    public function cancelPost()
    {
        $this->addPostMode = false;
        $this->updatePostMode = false;
        $this->resetFields();
    }
 
    /**
     * delete specific post data from the posts table
     * @param mixed $id
     * @return void
     */
    #[On('deletePostListner')]
    public function deletePost($id)
    {
        try{
            PostModel::find($id)->delete();
            session()->flash('success',"Post Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }
}