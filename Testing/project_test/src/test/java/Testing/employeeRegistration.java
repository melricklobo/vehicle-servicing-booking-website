package Testing;

import org.openqa.selenium.Alert;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

import io.cucumber.java.en.Given;
import io.cucumber.java.en.Then;
import io.cucumber.java.en.When;

public class employeeRegistration {
	
	public WebDriver driver;

	@Given("Browser is open")
	public void browser_is_open() {
		System.out.println("in: Browser Open");
		 System.setProperty("webdriver.chrome.driver","C:\\Users\\Melrick\\Desktop\\Selenium\\chromedriver.exe");
	   driver = new ChromeDriver();
	   driver.manage().window().maximize();
	}
	
	@Given("Admin is logged in")
	public void admin_is_logged_in() {
        driver.get("http://localhost/ServiceCenter/index.php");
        driver.findElement(By.id("loginEmail")).sendKeys("ruarlekar@gmail.com");
        driver.findElement(By.id("loginPassword")).sendKeys("12345");
        driver.findElement(By.id("loginButton")).click();
	}
	
	@When("Admin clicks on add employee button")
	public void admin_clicks_on_add_employee_button() {
		driver.findElement(By.id("add_Employee")).click();
	}
	
	@When("Admin provides employee details")
	public void admin_provides_employee_details() {
		System.out.println("Admin provides employee details");
		driver.findElement(By.name("employee-name")).sendKeys("Denbear");
		driver.findElement(By.name("employee-contact")).sendKeys("1234567890");
		driver.findElement(By.name("employee-email")).sendKeys("den@gmail.com");
		driver.findElement(By.name("employee-password")).sendKeys("denbear");
		driver.findElement(By.name("employee-address")).sendKeys("aldona");
		
	}
	
	@When("Admin submits employee data")
	public void admin_submits_employee_data() {
		System.out.println("Admin submits employee data");
		driver.findElement(By.id("reg_emp")).click();
		Alert alert = driver.switchTo().alert();
		alert.accept();
	}
	
	@Then("employee gets registered")
	public void employee_gets_registered() {
		System.out.println("employee gets registered");
		 driver.get("http://localhost/ServiceCenter/displayEmp.php");
	}
	

}
