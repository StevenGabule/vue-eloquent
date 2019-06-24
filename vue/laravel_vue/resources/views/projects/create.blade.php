<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learn Laravel with Vue</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <style>
    body {
        padding: 20px;
    }
    </style>
</head>
<body>
    <div id="app" class="container">
        <ul>
            @foreach ($projects as $project)
            <li>{{ $project->title }}</li>
            @endforeach
        </ul>

        <form action="{{ route('project.store') }}" method="post" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
            <div class="field">
                <div class="control">
                    <label for="title" class="label">Project title:</label>
                    <input type="text" id="title" name="title" class="input" v-model="form.title">
                    <span class="help is-danger" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <label for="description" class="label">Project description:</label>
                    <input type="text" id="description" name="description" class="input" v-model="form.description">
                    <span class="help is-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                </div>
            </div>
            <div class="control">
                <button class="button is-primary" :disabled="form.errors.any()">Create</button>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>