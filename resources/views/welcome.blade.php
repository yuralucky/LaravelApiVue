<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Habr Comments Tree</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
<div id="app">
    <h3>All comments</h3>
    <comment-component
        v-bind:tech1="item"
        v-for="(item,index) in comments"
        :index="item.id"
        :key="item.id"
    ></comment-component>
    <h5>Add new comment</h5>
    <form-component></form-component>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
