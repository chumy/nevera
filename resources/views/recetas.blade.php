<html>
	<body>
		 <div class="container">
            <div class="content">
                <ul>
                @foreach ($recetas as $receta)
                	<li>{{ $receta->nombre }}</li>
                @endforeach
                </ul>
            </div>
        </div>
	</body>
</html>
