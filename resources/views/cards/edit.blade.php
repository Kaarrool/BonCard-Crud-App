<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit a Card</title>
</head>
<body>
    <h1>Edit a Card</h1>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div>
        <a href="{{ route('card.index') }}" class="btn btn-primary">Back to Cards</a>
    </div>
    
    <form method="post" action="{{route('card.update', ['card' => $card])}}">
        @csrf 
        @method('put')
        <div>
            <label>Card number</label>
            <input type="text" name="card_number" value="{{ $card->card_number }}" placeholder="Card number"/>
        </div>
        <div>
            <label>PIN</label>
            <input type="text" name="pin" value="{{ $card->pin }}" placeholder="PIN"/>
        </div>
        <div>
            <label>Activation Date</label>
            <input type="datetime-local" name="activation_date" value="{{ $card->activation_date }}" placeholder="Activation Date"/>
        </div>
        <div>
            <label>Expiration Date</label>
            <input type="datetime-local" name="expiration_date" value="{{ $card->expiration_date }}" placeholder="Expiration Date"/>
        </div>
        <div>
            <label>Balance</label>
            <input type="text" name="balance" value="{{ $card->balance }}" placeholder="Balance"/>
        </div>
        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
</body>
</html>