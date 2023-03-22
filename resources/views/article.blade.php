<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Titre (en français)</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="form-group">
                <label for="title_ar">Titre (en arabe)</label>
                <input type="text" class="form-control" name="title_ar" id="title_ar" required>
            </div>
            <div class="form-group">
                <label for="body">Corps (en français)</label>
                <textarea class="form-control" name="body" id="body" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="body_ar">Corps (en arabe)</label>
                <textarea class="form-control" name="body_ar" id="body_ar" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" name="image" id="image">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

    </body>
</html>
