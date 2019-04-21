<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title', 'AvoRed E commerce')</title>

    <script defer src="{{ asset('avored-admin/js/app.js') }}"></script>
    
    <!-- Styles -->
    <link href="{{ asset('avored-admin/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <login-fields loginpost="{{ route('admin.login.post') }}" inline-template>
            <div>
                <a-row type="flex" align="middle">
                    <a-col :span="12">
                        <a-row type="flex">
                        <a-col :span="20" :offset="2">
                            <a-card title="{{ __('avored::system.login-card') }}">
                                <a-form
                                    :form="loginForm"
                                    method="post"
                                    action="{{ route('admin.login.post') }}"
                                    @submit="handleSubmit"
                                >
                                    @csrf()
                                    <a-form-item label="{{ __('avored::system.email') }}">
                                    <a-input
                                        :auto-focus="true"
                                        name="email"
                                        v-decorator="[
                                        'email',
                                        {rules: 
                                            [
                                                {   required: true, 
                                                    message: '{{ __('avored::validation.required', ['attribute' => 'email']) }}' 
                                                }
                                            ]
                                        }
                                        ]"
                                    />
                                    </a-form-item>
                                    <a-form-item label="{{ __('avored::system.password') }}">
                                        <a-input
                                            name="password"
                                            type="password"
                                            v-decorator="[
                                            'password',
                                            {rules: [{ required: true, message: '{{ __('avored::validation.required', ['attribute' => 'password']) }}' }]}
                                            ]"
                                        />
                                    </a-form-item>
                                    
                                    <a-form-item>
                                        <a-button
                                            type="primary"
                                            html-type="submit"
                                        >
                                            {{ __('avored::system.login') }}
                                        </a-button>
                                    </a-form-item>
                                </a-form>
                            </a-card>
                        </a-col>
                        </a-row>
                    </a-col>
               
                    <a-col :span="12">
                        <div class="h-100 bg-primary">
                        </div>
                    </a-col>
                </a-row>
            </div>
         
        </login-fields>
    </div>
    @stack('scripts')
</body>
</html>
