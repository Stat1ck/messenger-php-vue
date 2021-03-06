	<section class="forms-wrapper">
		<div class="form-register">
			<h2>Регистрация</h2>
			<form action="/api/create/user" method="POST" class="form-auth">
				<div class="form-content">
					<div class="form-inp">
						<div class="form-labels">
							<label for="firstname">Firstname: </label>
							<label for="lastname">Lastname: </label>
							<label for="age">Age: </label>
							<label for="email">E-mail: </label>
							<label for="tel">Phone number: </label>
							<label for="login">Login: </label>
							<label for="password">Password: </label>
							<label for="rpassword">Repeat password: </label>
						</div>
						<div class="form-inputs">
							<input type="text" id="firstname" name="firstname" placeholder="Ivan" required />
							<input type="text" id="lastname" name="lastname" placeholder="Ivanov" required />
							<input type="number" id="age" name="age" placeholder="Age" value="18" required />
							<input type="text" id="email" name="email" placeholder="E-mail" required />
							<input type="tel" id="tel" name="phone" placeholder="Phone number" max="20" required />
							<input type="text" id="login" name="login" placeholder="Login" required />
							<input type="password" id="password" name="password" placeholder="Password" required />
							<input type="password" id="rpassword" name="rpassword" placeholder="Repeat password" required />
						</div>
					</div>
					<div class="form-button">
						<button class="btn-submit" type="submit">Зарегистрироваться</button>
					</div>
				</div>
			</form>
		</div>
	</section>