@if($order_type == 'ph')
    <div id="_target" class="pmbb-view">
        <dl class="dl-horizontal">
            <dt>Account Name:</dt>
            <dd>{{$user->bank->acct_name}}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Bank:</dt>
            <dd>{{$user->bank->bank_name}}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Account No:</dt>
            <dd>{{$user->bank->acct_number}}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Phone:</dt>
            <dd>{{$user->phone}}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Note</dt>
            <dd>Please call the matched member <span style="color: #9e0101">before</span> and <span style="color: #9e0101">after</span> payment, and Remember that uploading of fake teller is a criminal (Fraud) offence.Pls united we stand.</dd>
        </dl>
    </div>

@else
    <div id="_target" class="pmbb-view">
        <dl class="dl-horizontal">
            <dt>Fullname Name:</dt>
            <dd>{{$user->name}}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Phone:</dt>
            <dd>{{$user->phone}}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Note</dt>
            <dd>You can called the peered member to informed him/her about the match, and if he didn't pays before the time runs out, you will be rematched.</dd>
        </dl>
    </div>
@endif

