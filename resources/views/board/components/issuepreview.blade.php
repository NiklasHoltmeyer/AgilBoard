<!-- css/js werden in der obersten klasse unterhalb des main layouts inkludiert -->

<div class="issue" issueID="{{$issue['id']}}" boardID="{{$boardID}}">
    <a href="/issues/{{ $issue['id'] }}" ><strong ><i class="material-icons handle">reorder</i>{{ $issue['name'] }}</strong><span class="grey-text issueID"> #{{ $issue['id'] }}</span></a>    
</div>        


