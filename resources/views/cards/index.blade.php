<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cards</title>
</head>
<body>
    <h1>Cards</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('card.create')}}">Create a Card</a>
        </div>
        <table border="1">
            <tr>
                <th></th>
                <th>Card Number</th>
                <th>Pin</th>
                <th>Activation Date</th>
                <th>Expiration Date</th>
                <th>Balance</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($cards as $index => $card)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{$card->card_number}}</td>
                    <td>{{$card->pin}}</td>
                    <td>{{$card->activation_date}}</td>
                    <td>{{$card->expiration_date}}</td>
                    <td>{{$card->balance}}</td>
                    <td>
                        <a href="{{route('card.edit', ['card' => $card])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('card.destroy', ['card' => $card])}}" onsubmit="return confirm('Are you sure you want to remove the card?')">
                            @csrf 
                            @method('delete')
                            <input type="hidden" name="page" value="{{ $cards->currentPage() }}">
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $cards->links() }}
    </div>
</body>
</html>