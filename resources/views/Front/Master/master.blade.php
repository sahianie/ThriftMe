<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>ThriftMe</title>
	<meta charset="UTF-8">
	<meta name="description" content="ThriftMe">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@include('Front.Partial.Style')

<style>
	
</style>

</head>
<body>
	<!-- Page Preloder
	<div id="preloder">
		<div class="loader"></div>
	</div> -->
	
	@include('Front.Partial.Header')

	@yield('content')

	@include('Front.Partial.Footer')
	
    @include('Front.Partial.Script')

    </body>
</html>