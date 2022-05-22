<?php $base = env('MAIN_PANEL_ASSETS_DIR') ?>


@component('admin.layouts.content', ['title' => 'لیست نظرات'])
    <div class="card">
        <div class="card-body">
            <div class="mb-5 d-flex justify-content-between">
                <div class="p-2">
                    <form>
                        <div class="input-group">
                            <input name="search" value="{{request('search')}}" type="search"
                                   class="form-control rounded" placeholder="متن مورد نظر" aria-label="Search"
                                   aria-describedby="search-addon"/>
                            <button type="submit" class="btn btn-outline-primary">جست و جو</button>
                        </div>
                    </form>
                </div>
            </div>

            <section class="row">
                <div class="table-responsive">
                    <table class="table mb-4 table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">آی دی نظر</th>
                            <th scope="col">نام کاربر</th>
                            <th scope="col">متن نظر</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>

                                <td>{{$comment->id}}</td>
                                <td>{{$comment->user->name}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>
                                    <form class="d-inline" action="{{route('admin.comments.destroy', $comment->id)}}"
                                          method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="card-footer">
            {{ $comments->appends(['search' => request('search')])->render() }}
        </div>
    </div>

@endcomponent
