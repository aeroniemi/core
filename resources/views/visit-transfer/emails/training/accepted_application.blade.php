@extends('emails.messages.post')

@section('body')
<p>
    A new {{ $application->type_string }} application for {{ $application->facility->name }} has been accepted by the Community Department.
</p>

<h3>Application Details</h3>

<p>
    <strong>ID:</strong> {{ $application->public_id }}<br />
    <strong>Type:</strong> {{ $application->type_string }}<br />
    <strong>Name:</strong> {{ $application->account->name }} ({{ $application->account_id }})<br />
    <strong>Facility:</strong> {{ $application->facility->name }}<br />
    <strong>Statement:</strong> {{ $application->statement_required ? $application->statement : "None required for this facility" }}
</p>

<h3>References</h3>

@forelse($application->referees as $reference)
    <p>
        <strong>Name:</strong> {{ $reference->account->name }} ({{ $reference->account_id }})<br />
        <strong>Relationship:</strong> {{ $reference->relationship }}<br />
        <strong>Status:</strong> {{ $reference->status_string }} {{ $reference->status_note ? $reference->status_note : "" }}<br />
        <strong>Reference:</strong> {{ $reference->reference }}
    </p>
@empty
    @if($application->references_required === 0)
        <p>References are not required for this facility.</p>
    @endif
@endforelse

<p>
    Please login to the administrative panel to review this application, along with any additional notes/comments.
</p>
@stop