<div class="reservation-info">
  <!-- action="<?php //echo esc_url( admin_url('admin-post.php') ); ?>" -->
  <form  class="reservation-form" method="post">
    <h2>Make a reservation</h2>
    <div class="field">
      <input type="text" name="name" placeholder="Name" required>
    </div>
    <div class="field">
      <input type="datetime-local" name="date" placeholder="Date" required>
    </div>
    <div class="field">
      <input type="email" name="email" placeholder="E-mail" required>
    </div>
    <div class="field">
      <input type="tel" name="phone" placeholder="Phone Number" required>
    </div>
    <div class="field">
      <textarea name="message" placeholder="Messages" required></textarea>
    </div>
    <input type="submit" name="reservation" class="button">
    <!-- <input trpe="hidden" name="hidden" value="1"> -->
    <!-- <input type="hidden" name="action" value="reservation_form"> -->
  </form>
</div>
