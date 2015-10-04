@if (Session::has('flash_message'))

	{{ Session::get('flash_message') }}

@endif