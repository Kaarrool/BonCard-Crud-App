<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create a Card</h1>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div>
        <a href="{{ route('card.index') }}" class="btn btn-primary">Back to Cards</a>
    </div>

    <form method="post" action="{{route('card.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Card number</label>
            <input type="text" name="card_number" placeholder="Card number" id="card_number">
            @if($errors->has('card_number'))
                <span class="error-message">{{ $errors->first('card_number') }}</span>
            @endif
        </div>
        <div>
            <label>PIN</label>
            <input type="text" name="pin" placeholder="PIN" id="pin">
            @if($errors->has('pin'))
                <span class="error-message">{{ $errors->first('pin') }}</span>
            @endif
        </div>
        <div>
            <label>Activation Date</label>
            <input type="datetime-local" name="activation_date" placeholder="Activation Date">
            @if($errors->has('pin'))
                <span class="error-message">{{ $errors->first('activation_date') }}</span>
            @endif
        </div>
        <div>
            <label>Expiration Date</label>
            <input type="datetime-local" name="expiration_date" placeholder="Expiration Date">
            @if($errors->has('pin'))
                <span class="error-message">{{ $errors->first('expiration_date') }}</span>
            @endif
        </div>
        <div>
            <label>Balance</label>
            <input type="text" name="balance" placeholder="Balance">
            @if($errors->has('balance'))
                <span class="error-message">{{ $errors->first('balance') }}</span>
            @endif
        </div>
        <div>
            <input type="submit" value="Create a Card">
        </div>
    </form>
</body>
</html>
