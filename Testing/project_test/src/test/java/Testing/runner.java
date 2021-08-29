package Testing;

import org.junit.runner.RunWith;
import io.cucumber.junit.Cucumber;
import io.cucumber.junit.CucumberOptions;

@RunWith(Cucumber.class)
@CucumberOptions(features="src/test/resources/Feature", glue= {"Testing"},
plugin = {"pretty","html:target/HTMLReports/htmlReports.html"}
		)

public class runner {
	
	

}
