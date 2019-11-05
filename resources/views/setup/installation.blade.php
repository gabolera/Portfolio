<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('wizard/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('wizard/css/style.css')}}">
    
</head>
<body>

    <div class="main">

        <div class="container">
            <h2>Instalação do sistema</h2>
            <form method="POST" action="{{route('install.process')}}" id="signup-form" class="signup-form" enctype="multipart/form-data">
            @csrf
                <h3>Criando Usuário</h3>
                <fieldset>
                    <div class="form-row">
                        <div class="form-file">
                            <input type="file" class="inputfile" name="your_picture" id="your_picture"  onchange="readURL(this);" data-multiple-caption="{count} files selected" multiple />
                            <label for="your_picture">
                                <figure>
                                    <img src="{{asset('wizard/images/your-picture.png')}}" alt="" class="your_picture_image">
                                </figure>
                                <span class="file-button">choose picture</span>
                            </label>
                        </div>
                        <div class="form-group-flex">
                            <div class="form-group">
                                <input type="text" name="username" id="username" required placeholder="Seu Nome" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" required placeholder="Seu Email" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" required placeholder="Senha" />
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>Sobre o site</h3>
                <fieldset>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="text" name="site_name" id="site_name" placeholder="Nome do site" />
                        </div>
                        <div class="form-input">
                            <input type="text" name="site_description" id="site_description" placeholder="Descrição do site" />
                        </div>
                    </div>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="email" name="contact_email" id="email" required placeholder="Email contato" />  
                        </div>
                        <div class="form-input">
                            <input type="text" name="contact_phone" id="contact_phone" placeholder="Telefone contato" />
                        </div>
                    </div>

                    

                </fieldset>

                <h3>Address</h3>
                <fieldset>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="text" name="street" id="street" placeholder="Endereco" />
                        </div>
                        <div class="form-input">
                            <input type="text" name="number" id="number" placeholder="Numero" />
                        </div>
                    </div>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="text" name="neighborhood" id="neighborhood" placeholder="Bairro" />
                        </div>
                        <div class="form-input">
                            <input type="text" name="complement" id="complement" placeholder="Complemento" />
                        </div>
                    </div>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="text" name="state" id="state" placeholder="Estado" />
                        </div>
                        <div class="form-input">
                            <input type="text" name="country" id="country" placeholder="País" />
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="{{asset('wizard/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('wizard/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('wizard/jquery-validation/dist/additional-methods.min.js')}}"></script>
    <script src="{{asset('wizard/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('wizard/js/main.js')}}"></script>
</body>
</html>