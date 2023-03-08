<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>ISS Test</title>
</head>
<body>
<div class="container">
    <form method="post" action="{{ route('frontend.getCalculation') }}">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="image_a_width">ImageA width</label>
                <input type="text" name="image_a_width" class="form-control" id="image_a_width" placeholder="Enter imageA width (250)" value="{{ old('image_a_width') }}">
                @error('image_a_width')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="image_a_height">ImageA height</label>
                <input type="text" name="image_a_height" class="form-control" id="image_a_height" placeholder="Enter imageA height (500)" value="{{ old('image_a_height') }}">
                @error('image_a_height')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="image_b_width">ImageB width</label>
                <input type="text" name="image_b_width" class="form-control" id="image_b_width" placeholder="Enter imageB width (500)" value="{{ old('image_b_width') }}">
                @error('image_b_width')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="image_b_height">ImageB height</label>
                <input type="text" name="image_b_height" class="form-control" id="image_b_height" placeholder="Enter imageB height (90)" value="{{ old('image_b_height') }}">
                @error('image_b_height')
                <div class="text-danger"> {{ $message }} </div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
