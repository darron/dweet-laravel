## dweet-laravel

Just playing around with the [Laravel framework](http://laravel.com/) and cloning [Dweet.io](http://dweet.io/).

Live example is here: [http://dweet.octohost.io/](http://dweet.octohost.io/)

### Todo:

1. Make sure "thing" is unique? Needed? Not sure I need to.
2. Add route to deal with posted Json.
3. Known possible bug: deal with missing Dweets in processDweets

### Done:

1. Disable Sessions.
2. Random naming: https://gist.github.com/afriggeri/1266756
3. Persistance of dweets for 86400.
4. Get the last dweet for a thing. get/latest/dweet/for/{name}
5. Allow them to set the "thing" name.
6. Get all dweets for a thing. get/dweets/for/{name}