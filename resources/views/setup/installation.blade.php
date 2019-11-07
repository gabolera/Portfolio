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
    <script src="{{asset('js/jquery.3.1.1.min.js')}}"></script>

</head>

<body>

    <div class="ibox-content">
        <p>
            This is basic example of Step
        </p>
        <div id="wizard" role="application" class="wizard clearfix">
            <div class="steps clearfix">
                <ul role="tablist">
                    <li role="tab" class="first current" aria-disabled="false" aria-selected="true"><a id="wizard-t-0"
                            href="#wizard-h-0" aria-controls="wizard-p-0"><span class="current-info audible">current
                                step: </span><span class="number">1.</span> First Step</a></li>
                    <li role="tab" class="disabled" aria-disabled="true"><a id="wizard-t-1" href="#wizard-h-1"
                            aria-controls="wizard-p-1"><span class="number">2.</span> Second Step</a></li>
                    <li role="tab" class="disabled last" aria-disabled="true"><a id="wizard-t-2" href="#wizard-h-2"
                            aria-controls="wizard-p-2"><span class="number">3.</span> Third Step</a></li>
                </ul>
            </div>
            <div class="content clearfix">
                <h1 id="wizard-h-0" tabindex="-1" class="title current">First Step</h1>
                <div class="step-content body current" id="wizard-p-0" role="tabpanel" aria-labelledby="wizard-h-0"
                    aria-hidden="false">
                    <div class="text-center m-t-md">
                        <h2>Hello in Step 1</h2>
                        <p>
                            This is the first content.
                        </p>
                    </div>
                </div>

                <h1 id="wizard-h-1" tabindex="-1" class="title">Second Step</h1>
                <div class="step-content body" id="wizard-p-1" role="tabpanel" aria-labelledby="wizard-h-1"
                    aria-hidden="true" style="display: none;">
                    <div class="text-center m-t-md">
                        <h2>This is step 2</h2>
                        <p>
                            This content is diferent than the first one. Lorem Ipsum is simply dummy text of the
                            printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                            ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                            a type specimen book.
                        </p>
                    </div>
                </div>

                <h1 id="wizard-h-2" tabindex="-1" class="title">Third Step</h1>
                <div class="step-content body" id="wizard-p-2" role="tabpanel" aria-labelledby="wizard-h-2"
                    aria-hidden="true" style="display: none;">
                    <div class="text-center m-t-md">
                        <h2>This is step 3</h2>
                        <p>
                            This is last content.
                        </p>
                    </div>
                </div>
            </div>
            <div class="actions clearfix">
                <ul role="menu" aria-label="Pagination">
                    <li class="disabled" aria-disabled="true"><a href="#previous" role="menuitem">Previous</a></li>
                    <li aria-hidden="false" aria-disabled="false"><a href="#next" role="menuitem">Next</a></li>
                    <li aria-hidden="true" style="display: none;"><a href="#finish" role="menuitem">Finish</a></li>
                </ul>
            </div>
        </div>

    </div>

    <script src="{{asset('tabler/plugins/wizard/js-wizard.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }
    
                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }
    
                    var form = $(this);
    
                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }
    
                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";
    
                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }
    
                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);
    
                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";
    
                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);
    
                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>
</body>

</html>