<head>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="mx-2 mt-4">

        @if (isset($data['user']['logo']) && $data['user']['logo'] != '')
        <div style="margin-top: 150px;" class="text-center">
            <img src="{{ public_path($data['user']['logo']) }}" data-holder-rendered=" true" width="50%"></img>
        </div>
        <h2 class="text-center mt-4 mb-4" style="font-size: 40px;">{{ $data['auditory']['title'] }}</h2>
        @else
        <h2 class="text-center mb-4" style="margin-top: 450px; font-size: 40px;">{{ $data['auditory']['title'] }}</h2>
        @endif

        <p class="mt-4 text-center"><strong>Fecha</strong></p>
        <p class="text-center">{{ $data['auditory']['date'] }} {{ $data['auditory']['time'] }}</p>
        <p class="mt-4 text-center"><strong>Realizada por</strong></p>
        <p class="text-center">{{ $data['user']['name'] }}</p>

        <div class="page-break"></div>

        <h2 class="text-center"><strong>Ubicación</strong></h2>
        <div class="text-center">
            <img src="https://api.mapbox.com/styles/v1/mapbox/streets-v12/static/pin-s+555555({{ $data['auditory']['lng'] }},{{ $data['auditory']['lat'] }})/{{ $data['auditory']['lng'] }},{{ $data['auditory']['lat'] }},16,0/300x200?access_token={{ env('MAPBOX_KEY') }}" data-holder-rendered=" true" width="50%"></img>
        </div>

        @if (isset($data['auditory']['description']) && $data['auditory']['description'] != '')
        <p class="text-left mt-4"><strong>Descripción</strong></p>
        <p class="text-justify">{{ $data['auditory']['description'] }}</p>

        @endif

        @if (count($data['auditory']['evidences']) > 0)
        <h2 class="text-center mt-4">
            <strong>Fotografías del entorno</strong>
        </h2>


        @for($i = 0; $i < count($data['auditory']['evidences']); $i++) <div class="text-center mb-4">
            <img src="{{ public_path($data['auditory']['evidences'][$i]) }}" data-holder-rendered="true" width="50%"></img>
    </div>
    @endfor

    <div class="page-break"></div>
    @endif

    @for($i = 0; $i < count($data['sections']); $i++) <div class="mx-2 mt-2 border-bottom">
        <div class="text-center mb-4">
            <h2>{{ $data['sections'][$i]['name'] }}</h2>
            <h3>{{ $data['sections'][$i]['subname'] }}</h3>
        </div>

        @for($j = 0; $j < count($data['sections'][$i]['answers']); $j++) <div>
            <p><strong>{{ $data['sections'][$i]['answers'][$j]['uid'] }} - {{ $data['sections'][$i]['answers'][$j]['sentence'] }}</strong></p>

            <p class="ps-5"><strong>R:</strong> {{ $data['sections'][$i]['answers'][$j]['formattedAnswer'] }}</p>

            @if ($data['sections'][$i]['answers'][$j]['dir'] != null)
            <p class="text-center">
                <img src="{{ public_path($data['sections'][$i]['answers'][$j]['dir']) }}" width="50%">
            </p>
            @endif
            </div>
            @endfor
            </div>

            <div class="page-break"></div>
            @endfor

            <h2 class="text-center">Resultados</h2>

            <p class="ion-text-justify mt-3 text-center">Con las repuestas ingresadas en la auditoría se consiguieron los siguientes acumulados:</p>
            <h5 class="mt-2 text-center">Puntuación Si: {{ $data['yesCount'] }}</h5>
            <h5 class="text-center">Puntuación No: {{ $data['notCount'] }}</h5>

            @if (isset($data['auditory']['close_note']) && $data['auditory']['close_note'] != '')
            <div class="mt-4"></div>
            <div class="mt-4"></div>
            <p class="text-left mt-4"><strong>Notas Finales</strong></p>

            <p class="text-justify">{{ $data['auditory']['close_note'] }}</p>
            @endif
            </div>

            <div class="mt-4"></div>
            <div class="mt-4"></div>
            <p class="mt-4"><strong>Datos de contacto</strong></p>
            <p class="mt-4">{{ $data['user']['name'] }}</p>
            <p class="mt-4">{{ $data['user']['email'] }}</p>
            <p class="mt-4">{{ $data['user']['phone_number'] }}</p>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
