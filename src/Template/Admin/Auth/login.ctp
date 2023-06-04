    <div class="card-body">
		<div class="text-center">
			<img width="250" src="<?= $this->Url->build('/img/logo.png',true); ?>" alt="">
		</div>
		<div class="card-text">
			<?= $this->Form->create(null, ['controller' => 'Auth', 'action' =>  'login']) ?>
				<!-- to error: add class "has-danger" -->
				<div class="form-group">
					<label for="username">Username</label>
					<input type="email" name="username" placeholder="jhondoe@example.com" class="form-control form-control-sm" id="username" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<!-- <a href="#" style="float:right;font-size:12px;">Forgot password?</a> -->
					<input type="password" name="password" placeholder="123456789" class="form-control form-control-sm" id="password" required>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Login</button>
				
				<!-- <div class="sign-up">
					Don't have an account? <a href="#">Create One</a>
				</div> -->
			<?= $this->Form->end() ?>
		</div>
	</div>
