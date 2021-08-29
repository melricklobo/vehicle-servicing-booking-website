package appointmentTest;

import org.junit.runner.RunWith;
import io.cucumber.junit.Cucumber;
import io.cucumber.junit.CucumberOptions;

@RunWith(Cucumber.class)
@CucumberOptions(features="src/test/resources/Features", glue= {"appointmentTest"},
plugin = {"pretty","html:target/HTMLReports/htmlReports.html"}
		)

public class RunnerClass {
	

}




















