<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories list</title>
</head>

<body>
    <h1>Categories list</h1>

    @forelse ($categories as $category)
    <div>
        <h2>{{ $category->name }}</h2>
    </div>
    @empty
    <p>Il n'y a pas de catégories disponibles.</p>
    @endforelse
</body>

</html>