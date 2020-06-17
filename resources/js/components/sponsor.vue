<template>
  <div class="container">
    <div class="columns is-mobile is-centered">
      <div class="column">
        <div class="box has-background-light">
          <p>
            Invite your friends to join ClickWin via your referrer link and earn
            <span
              class="tag is-warning is-medium"
            >30 Cwins</span> for each friend.
          </p>
          <div class="field">
            <label class="label is-large">Your referral link:</label>
            <div class="control has-icons-right">
              <input
                id="code"
                type="text"
                v-model="referrallink"
                placeholder="referrallink"
                disabled
                class="input is-large"
              />
              <span @click="copy()" class="icon is-right is-medium is-active">
                <i class="fas fa-copy"></i>
              </span>
            </div>
          </div>
        </div>
        <div class="column is-6 is-offset-3">
          <div class="box has-background-gray">
            <table class="table">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(user,index) in $data._referrals" :key="index">
                  <td>Username</td>
                  <td>Date</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("coco");
    console.log(this.referrallink);
    this._referrals = JSON.parse(this.referrals);
    console.log(this._referrals);
  },
  props: ["referrallink", "referrals"],
  data() {
    return {
      _referrals: []
    };
  }
};
</script>
