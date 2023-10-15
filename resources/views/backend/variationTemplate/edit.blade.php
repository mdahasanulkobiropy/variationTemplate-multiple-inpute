<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Variation Template edit</title>
</head>
<body>
    <div class="container my-4">
        <form id="myForm" action="{{route('update.variationTemplate', $variationTemplate->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-control" for="">Variation Template:</label>
                <input type="text" name="name" class="form-control" value="{{$variationTemplate->name}}">
            </div>
            <div class="mb-3">
                <label class="form-control" for="">Variation Value Template:</label>
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-primary add-input">Add Input</button>
            </div>
            <div class="mb-3" id="input-container">
                <div class="input-group mb-3">
                   {{-- {{$variationTemplate->getVariationValueTemplate}} --}}
                   @foreach ($variationTemplate->getVariationValueTemplate as $item)
                       
                        <input type="text" name="input[]" value="{{$item->name}}" class="form-control" placeholder="Enter value">
                        <input type="text" name="input_id[]" value="{{$item->id}}" class="form-control" placeholder="Enter value Id">
                        
                        <button type="button" class="btn btn-danger remove-input">Remove</button>
                   @endforeach
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>        
    </div>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Add input field
            $(".add-input").click(function () {
                var inputGroup = '<div class="input-group"><input type="text" name="input[]" class="form-control" placeholder="Enter value"><button type="button" class="btn btn-danger remove-input">Remove</button></div>';
                $("#input-container").append(inputGroup);
                var inputGroup = '<div class="input-group"><input type="text" name="input_id[]" class="form-control" placeholder="Enter value"><button type="button" class="btn btn-danger remove-input">Remove</button></div>';
                $("#input-container").append(inputGroup);
            });

            // Remove input field
            $("#input-container").on("click", ".remove-input", function () {
                $(this).parent().remove();
            });
        });
    </script>
</html>