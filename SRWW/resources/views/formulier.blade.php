@extends('layout')

@section('content')
    <form action="/submit" method="POST">
        <label for="name" id="name">Naam:</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="email" id="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="number" id="lidmaatsnummer">Lidmaatschapsnummer:</label><br>
        <input type="number" id="lidmaatsnummer" name="lidmaatsnummer"><br>
        <label for="number" id="personen">Aantal personen:</label><br>
        <input type="number" id="personen" name="personen"><br><br>
        <label for="toelichting" id="toelichting">Toelichting:</label><br>
        <textarea id="toelichting" name="toelichting" rows="4" cols="50"></textarea><br><br>
        <label for="voorkeur" id="voorkeur">Voorkeur huisje:</label><br>
        <input type="radio" class="huisjes" id="huisje1" name="voorkeur" value="huisje1">
        <label for="huisje1" class="huisjes">Huisje 1</label><br>
        <input type="radio" class="huisjes" id="huisje2" name="voorkeur" value="huisje2">
        <label for="huisje2" class="huisjes">Huisje 2</label><br>
        <input type="radio" class="huisjes" id="huisje3" name="voorkeur" value="huisje3">
        <label for="huisje3" class="huisjes">Huisje 3</label><br>
        <input type="radio" class="huisjes" id="huisje4" name="voorkeur" value="huisje4">
        <label for="huisje4" class="huisjes">Huisje 4</label><br>
        <input type="radio" class="huisjes" id="huisje5" name="voorkeur" value="huisje5">
        <label for="huisje5" class="huisjes">Huisje 5</label><br>
        <input type="radio" class="huisjes" id="huisje6" name="voorkeur" value="huisje6">
        <label for="huisje6" class="huisjes">Huisje 6</label><br>
        <input type="radio" class="huisjes" id="geen voorkeur" name="voorkeur" value="geen voorkeur">
        <label for="geen voorkeur" class="huisjes">Geen voorkeur</label><br><br>
        <label for="weeknummer" id="weeknummer">Weeknummer:</label><br>
        <input type="number" id="weeknummer" name="weeknummer"><br><br>
        <input type="submit" value="Submit">
    </form>
@endsection