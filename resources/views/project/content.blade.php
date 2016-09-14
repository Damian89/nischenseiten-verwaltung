@extends('layouts.fullwidth')

@section('content')
<div class="row">    
    @if( Session::get('project.id') )

    @include('project.sidebar')

    <div class="col-xs-10">

        <div id="top-buttons" class="row">

            <div class="col-lg-6">
                <button id="add-projectcontent" class="btn btn-success pull-left"><i class="fa fa-plus"></i> Neu</button>
            </div>

            <div class="col-lg-6">
                @if(Session::get('project.content.archived')==0)
                <a href="/project/content/showarchived" class="btn btn-primary pull-right"><i class="fa fa-archive"></i> Archivierte anzeigen</a>
                @else
                <a href="/project/content/hidearchived" class="btn btn-warning pull-right"><i class="fa fa-archive"></i> Archivierte verbergen</a>
                @endif
            </div>

        </div>

        @if(count($content)>0)



        <div id="projectcontent-panel" class="panel panel-default">

            <div class="table-responsive">
                <table id="projectcontent-table" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Überschrift</th>
                            <th>Fokuskeyword</th>
                            <th>Notiz</th>
                            <th>Priorität</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @each('partials.project.content-tr',$content,'content')
                    </tbody>
                </table>
            </div>

        </div>

        @else

        @include('partials.project.empty')

        @endif
        <div id="message" class="alert"></div>

    </div>

    @else
    <div class="col-lg-12">
        <div class="alert alert-danger"><i class="fa fa-warning"></i> Bevor du die Projektmanagement-Funktionen nutzen kannst, musst du oben rechts in der Navigation auswählen, welches Projekt du verwalten willst.</div>
    </div>

    @endif
</div>
@endsection

@section('js.files')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script src="/js/project/content.add.js"></script>
<script src="/js/project/content.editables.js"></script>
<script src="/js/project/content.delete.js"></script>
@endsection

@section('css.files')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endsection

@section('js.inline.code') 

@endsection

@section('page.title')
Contentplanung - Projekt
@endsection