@section('title')
    Post
@endsection
<x-layout>
    @include('_posts-header')
    <x-post-featured-card :post="$post" />
</x-layout>
 

    


    

    