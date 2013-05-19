@extends('layouts.default')

@section('title')
    {{trans('general.referrals')}}
@stop

@section('content')

    
	<?php 
        $referrals = Referrals::all();
        $tbody = []; 
        $i = 1; 
        foreach ($referrals as $ref){
        	$user1 = User::find($ref->referral_id);
        	$user2 = User::find($ref->new_user_id);

            $tbody[]= [
                'id'     => $i, 
                'emailR'   => $user1['email'],
                'emailN'   => $user2['email'],
             ];
             $i++;
        }
    ?>

    {{ Table::hover_open(["class"=>'sortable', 'id'=> 'mobileTable']) }}
    {{ Table::headers('#', trans('general.provider',trans('general.invitedProvider', '') }}
    {{ Table::body($tbody) }}
    {{ Table::close() }}


@stop
