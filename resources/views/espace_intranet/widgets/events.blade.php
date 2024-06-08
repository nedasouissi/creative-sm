@php

    $dummyData = [
        [
            'title' => 'Card 1',
            'description' => 'Some quick example text for Card 1.',
            'button_text' => 'Learn More',
        ],
        [
            'title' => 'Card 2',
            'description' => 'Some quick example text for Card 2.',
            'button_text' => 'Explore',
        ],
        [
            'title' => 'Card 3',
            'description' => 'Some quick example text for Card 2.',
            'button_text' => 'Explore',
        ],
        [
            'title' => 'Card 4',
            'description' => 'Some quick example text for Card 2.',
            'button_text' => 'Explore',
        ],
        [
            'title' => 'Card 5',
            'description' => 'Some quick example text for Card 2.',
            'button_text' => 'Explore',
        ],

    ];

@endphp
<div class="row">
    <h5>Events</h5>
    @foreach ($dummyData as $data)
        <div class="col-md-3 py-3">
            <div class="card" style="width: 18rem;">
                <img style="max-height: 200px;" src="{{ asset('public_theme/assets/img/images/blog-1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $data['title'] }}</h5>
                    <p class="card-text">{{ $data['description'] }}</p>
                    <a href="#" class="btn btn-primary">{{ $data['button_text'] }}</a>
                </div>
            </div>

        </div>
    @endforeach



</div>
