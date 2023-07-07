<style>
    .page-break {
        page-break-after: always;
    }
</style>

<div class="mx-2 mt-4">
    <h1>{{ $data['auditory']['title'] }}</h1>

    <p class="mt-4"><strong>Fecha:</strong> {{ $data['auditory']['date'] }} {{ $data['auditory']['time'] }}</p>
    <p><strong>Descripción:</strong> {{ $data['auditory']['description'] }}</p>

    <!-- <p>
        <strong>Ubicación:</strong>
        <app-map></app-map>
    </p> -->

    <p>
        <strong class="mt-2">Fotografías del entorno:</strong>
    </p>



    @for($i = 0; $i < count($data['auditory']['evidences']); $i++)
        <p>
            <img src="{{ public_path($data['auditory']['evidences'][$i]) }}" data-holder-rendered="true" width="50%"></img>
        </p>
    @endfor

    <div class="page-break"></div>

    @for($i = 0; $i < count($data['sections']); $i++)
        <div class="mx-2 mt-2 border-bottom">
            <h2 class="text-center">{{ $data['sections'][$i]['name'] }}</h2>
            <h3 class="text-center">{{ $data['sections'][$i]['subname'] }}</h3>

            @for($j = 0; $j < count($data['sections'][$i]['answers']); $j++)
                <div>
                    <p><strong>{{ $data['sections'][$i]['answers'][$j]['uid'] }} - {{ $data['sections'][$i]['answers'][$j]['sentence'] }}</strong></p>

                    <p>{{ $data['sections'][$i]['answers'][$j]['formattedAnswer'] }}</p>

                    @if ($data['sections'][$i]['answers'][$j]['dir'] != null)
                        <p>
                            <img src="{{ public_path($data['sections'][$i]['answers'][$j]['dir']) }}" width="50%">
                        </p>
                    @endif
                </div>
            @endfor
        </div>

        <div class="page-break"></div>
    @endfor

    <h1>Resultados</h1>

    <p class="ion-text-justify mt-3">Con las repuestas ingresadas en la auditoría se consiguieron los siguientes acumulados:</p>
    <h5 class="mt-2">Puntuación Si: {{ $data['yesCount'] }}</h5>
    <h5>Puntuación No: {{ $data['notCount'] }}</h5>

    <p><strong>Notas Finales:</strong> {{ $data['auditory']['close_note'] }}</p>
</div>
