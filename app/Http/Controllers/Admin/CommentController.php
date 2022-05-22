<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $comments = Comment::query();
        if ($phrase = \request('search')) {
            $comments->where('comment', 'LIKE', "%{$phrase}%")->orWhereHas('user', function ($query) use ($phrase) {
                $query->where('name', 'LIKE', "%{$phrase}%");
            });
        }

        $comments = $comments->whereApproved(0)->latest()->paginate(20);
        return view('admin.comments.list', compact('comments'));
    }

    public function unapproved()
    {
        $comments = Comment::whereApproved(0)->latest()->paginate(20);
        return view('admin.comments.unapproved', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update(['approved' => 1]);

        alert()->success('نظر مورد نظر تایید شد');

        return redirect(route('admin.comments.unapproved'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        alert()->success('نظر مورد نظر با موافقیت حذف شد');

        return redirect(route('admin.comments.list'));
    }
}
