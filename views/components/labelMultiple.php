<script type="text/x-template" id="label-multiple">
<label class="card__check-label">
  <span class="card__check-custom" :class="count > 0 ? 'active' : ''">
    <span class="card__check-text">{{itemName}} + {{price}} Р</span>
    <span class="card__check-control">
      <span class="card__check-minus card__check-btn" @click="remove()">-</span>
      <span class="card__check-counter">{{count}}</span>
      <span class="card__check-plus card__check-btn" @click="add()">+</span>
    </span>
  </span>
</label>
</script>
