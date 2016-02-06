<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Ajax Uploader</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/image-image.css">
</head>
<body>

<div class="container">
    <div class="page-header">
        <h1>Image gallery</h1>

        <button id="uploadBtn" class="btn btn-large btn-primary">Choose File</button>

        <div class="col-xs-10 pull-right">
            <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                <div id="progressBar" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45"
                     aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                </div>
            </div>
        </div>
    </div>
    <div id="car" class="image-image"></div>
</div>


<script src="/assets/js/uploader.js"></script>
<script src="/assets/js/image-image.js"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>
