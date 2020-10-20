<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    <title>{{ trans('Routes list') }} | {{ config('app.name') }}</title>

    <link
        rel="shortcut icon"
        type="image/svg"
        sizes="16x16"
        href="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgMzk0Ljk3MSAzOTQuOTcxIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzOTQuOTcxIDM5NC45NzE7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxnPg0KCQk8Zz4NCgkJCTxwYXRoIGQ9Ik01Ni40MjQsMTQ2LjI4NmMtMjguMjc3LDAtNTEuMiwyMi45MjMtNTEuMiw1MS4yczIyLjkyMyw1MS4yLDUxLjIsNTEuMnM1MS4yLTIyLjkyMyw1MS4yLTUxLjINCgkJCQlTODQuNzAxLDE0Ni4yODYsNTYuNDI0LDE0Ni4yODZ6IE01Ni40MjQsMjI3Ljc4OEw1Ni40MjQsMjI3Ljc4OGMtMTYuNzM1LDAtMzAuMzAyLTEzLjU2Ny0zMC4zMDItMzAuMzAyDQoJCQkJczEzLjU2Ny0zMC4zMDIsMzAuMzAyLTMwLjMwMmMxNi43MzUsMCwzMC4zMDIsMTMuNTY3LDMwLjMwMiwzMC4zMDJTNzMuMTYsMjI3Ljc4OCw1Ni40MjQsMjI3Ljc4OHoiLz4NCgkJCTxwYXRoIGQ9Ik0zNzkuMjk4LDE4Ny4wMzdIMTQzLjE1MWMtNS43NzEsMC0xMC40NDksNC42NzgtMTAuNDQ5LDEwLjQ0OXM0LjY3OCwxMC40NDksMTAuNDQ5LDEwLjQ0OWgyMzYuMTQ3DQoJCQkJYzUuNzcxLDAsMTAuNDQ5LTQuNjc4LDEwLjQ0OS0xMC40NDlTMzg1LjA2OSwxODcuMDM3LDM3OS4yOTgsMTg3LjAzN3oiLz4NCgkJCTxwYXRoIGQ9Ik01Ni40MjQsMGMtMjguMjc3LDAtNTEuMiwyMi45MjMtNTEuMiw1MS4yczIyLjkyMyw1MS4yLDUxLjIsNTEuMnM1MS4yLTIyLjkyMyw1MS4yLTUxLjJTODQuNzAxLDAsNTYuNDI0LDB6DQoJCQkJIE01Ni40MjQsODEuNTAyYy0xNi43MzUsMC0zMC4zMDItMTMuNTY3LTMwLjMwMi0zMC4zMDJzMTMuNTY3LTMwLjMwMiwzMC4zMDItMzAuMzAyUzg2LjcyNiwzNC40NjUsODYuNzI2LDUxLjINCgkJCQlTNzMuMTYsODEuNTAyLDU2LjQyNCw4MS41MDJ6Ii8+DQoJCQk8cGF0aCBkPSJNMTQzLjE1MSw2MS42NDloMjM2LjE0N2M1Ljc3MSwwLDEwLjQ0OS00LjY3OCwxMC40NDktMTAuNDQ5cy00LjY3OC0xMC40NDktMTAuNDQ5LTEwLjQ0OUgxNDMuMTUxDQoJCQkJYy01Ljc3MSwwLTEwLjQ0OSw0LjY3OC0xMC40NDksMTAuNDQ5UzEzNy4zOCw2MS42NDksMTQzLjE1MSw2MS42NDl6Ii8+DQoJCQk8cGF0aCBkPSJNNTYuNDI0LDI5Mi41NzFjLTI4LjI3NywwLTUxLjIsMjIuOTIzLTUxLjIsNTEuMmMwLDI4LjI3NywyMi45MjMsNTEuMiw1MS4yLDUxLjJzNTEuMi0yMi45MjMsNTEuMi01MS4yDQoJCQkJQzEwNy42MjQsMzE1LjQ5NCw4NC43MDEsMjkyLjU3MSw1Ni40MjQsMjkyLjU3MXogTTg2LjcyNiwzNDMuNzcxYzAsMTYuNzM1LTEzLjU2NywzMC4zMDItMzAuMzAyLDMwLjMwMnYwDQoJCQkJYy0xNi43MzUsMC0zMC4zMDItMTMuNTY3LTMwLjMwMi0zMC4zMDJjMC0xNi43MzUsMTMuNTY3LTMwLjMwMiwzMC4zMDItMzAuMzAyUzg2LjcyNiwzMjcuMDM2LDg2LjcyNiwzNDMuNzcxTDg2LjcyNiwzNDMuNzcxeiIvPg0KCQkJPHBhdGggZD0iTTM3OS4yOTgsMzMzLjMyMkgxNDMuMTUxYy01Ljc3MSwwLTEwLjQ0OSw0LjY3OC0xMC40NDksMTAuNDQ5czQuNjc4LDEwLjQ0OSwxMC40NDksMTAuNDQ5aDIzNi4xNDcNCgkJCQljNS43NzEsMCwxMC40NDktNC42NzgsMTAuNDQ5LTEwLjQ0OVMzODUuMDY5LDMzMy4zMjIsMzc5LjI5OCwzMzMuMzIyeiIvPg0KCQk8L2c+DQoJPC9nPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo=">

    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">

    <style>
        .spaced { margin: 2px; }

        .deprecated { text-decoration: line-through; }

        .link:hover { text-decoration: underline; cursor: pointer; }
    </style>
</head>
<body>

<div id="app">
    @include('pretty-routes::vue')
</div>

@include('pretty-routes::scripts')

</body>
</html>
