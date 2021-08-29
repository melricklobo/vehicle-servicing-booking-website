package appointmentTest;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

import io.cucumber.java.en.Given;
import io.cucumber.java.en.Then;
import io.cucumber.java.en.When;

public class projectTest {
	public WebDriver driver;
	
	@Given("Browser is open")
	public void browser_is_open() {
		System.out.println("in: Browser Open");
	    System.setProperty("webdriver.chrome.driver", "F:\\java packages\\selenium\\chromedriver.exe");
	    driver = new ChromeDriver();
	    driver.manage().window().maximize();
	}
	//registration testing
	
	//login testing
	@Given("User is on login page")
	public void user_is_on_login_page() {
		System.out.println("In: User is on login page");
		System.out.println(driver);
		driver.get("http://localhost/Servicing/login.php");
	}

	@When("User Provides login details")
	public void user_provides_login_details() {
		driver.findElement(By.name("email")).sendKeys("ruarlekar@gmail.com");
		driver.findElement(By.name("password")).sendKeys("12345");
	}

	@When("user clicks login")
	public void user_clicks_login() {
		System.out.println("In:User clicks login");
		driver.findElement(By.name("login_button")).click();
		
	}

	@Then("the user is logged in")
	public void a_user_is_logged_in() {
		System.out.println("In:the user is logged in");
	}
	
		
	//booking testing
	@Given("User is on appointment booking page")
	public void user_is_on_appointment_booking_page() {
		System.out.println("In: User is on appointment booking page");
		System.out.println(driver);
		driver.get("http://localhost/servicing/booking.php");
		//driver.findElement(By.id("u_0_2_sA")).click();
	}

	@When("User Provides details")
	public void user_provides_details() {
		System.out.println("In: User Provides details");
		driver.findElement(By.name("name")).sendKeys("Aishwarya");
		driver.findElement(By.name("contact")).sendKeys("7778789997");
		driver.findElement(By.name("address")).sendKeys("porvorim");
		driver.findElement(By.name("email")).sendKeys("aishwarya@gmail.com");
		driver.findElement(By.name("model")).sendKeys("Honda Activa");
		driver.findElement(By.name("reg")).sendKeys("GA/05/K/7658");
		driver.findElement(By.name("distance")).sendKeys("4666");
		driver.findElement(By.id("datepick")).sendKeys("2021/03/30");
		driver.findElement(By.name("service_name")).sendKeys("Air Check");
		driver.findElement(By.name("desc")).sendKeys("Please help");
	}

	@When("user submits")
	public void user_submits() {
		System.out.println("In:user submits");
		driver.findElement(By.name("addAppt")).click();
	}

	@Then("A new appointment is booked")
	public void a_new_appointment_is_booked() {
		System.out.println("In:A new appointment is booked");
	}
	
	
	
	

}
