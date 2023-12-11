@extends('frontend.layout.app')
@section("title","Notice List")
@section("meta")
    <meta name="result" content="Notice List">
@endsection
@section("content")
<div class="notice-lists">
    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
                <th scope="col" width="7%">ক্রমিক</th>
                <th scope="col" width="68%">শিরোনাম</th>
                <th scope="col" width="15%">প্রকাশের তারিখ</th>
                <th scope="col" width="10%">ডাউনলোড</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notices as $key=>$item)
            <tr>
                <td scope="row">{{ $key+1 }}</td>
                <td><a href="{{ route('notice.details',$item->slug) }}">{{ $item->name }}</a></td>
                <td>
                    <div class="date">{{ date('Y-m-d', strtotime($item->created_at)) }}</div>
                </td>
                <td>
                    <a href="{{ asset($item->file) }}" class="download" download><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Data Not Found!!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection