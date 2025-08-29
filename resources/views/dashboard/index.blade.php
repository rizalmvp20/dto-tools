@extends('layouts.dashboard')
@section('title','Dashboard')

@section('content')
  <div class="page-title">
    <h1>My Bookings</h1>
    <div class="actions">
      <input type="date" value="{{ now()->format('Y-m-d') }}">
      <button class="btn">Download report</button>
    </div>
  </div>

  <section class="card">
    <div class="card-head">
      <h3>Period overview</h3>
      <div class="tabs">
        <button class="tab active">Today</button>
        <button class="tab">Earned</button>
      </div>
    </div>
    <div class="chart-placeholder">[Chart placeholder]</div>
  </section>

  <section class="grid-2">
    <div class="card">
      <h3>Arriving today</h3>
      <ul class="list">
        <li><span class="badge green">Approved</span> Valencia apartment · $580 · 12:00</li>
        <li><span class="badge yellow">Pending</span> Night swimming pool · $1000 · 22:00</li>
        <li><span class="badge green">Approved</span> Unique & Cozy studio · $384 · 16:40</li>
      </ul>
      <a href="#" class="link">Show all →</a>
    </div>

    <div class="card promo">
      <div class="promo-box">
        <div class="promo-title">Low occupancy?</div>
        <div class="promo-sub">Create a last minute promotion to maximize</div>
        <button class="btn">Create</button>
      </div>
    </div>
  </section>
@endsection
