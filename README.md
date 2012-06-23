 

# Introduction


convert .yml to .Rmd

# Example

## yml



```
## [1] "Simulation:"
## [1] "  $latex \\phi = (-1, 1)^T$:"
## [1] "    Parameters:"
## [1] "      _content: |"
## [1] "        ```{r params-misq1, echo=FALSE}"
## [1] "        source(\"pre.R\")"
## [1] "        show.source(\"misq1.params.R\")"
## [1] "        ```"
## [1] "    Experiments:"
## [1] "      _attribute:"
## [1] "        _generator:"
## [1] "          0: distance"
## [1] "          1: test"
## [1] "        distance:"
## [1] "          distance0: 1"
## [1] "          distance1: 10"
## [1] "          distance2: 100"
## [1] "          distance3: 1000"
## [1] "        test:"
## [1] "          test0: 1"
## [1] "          test1: 10"
## [1] "          test2: 100"
## [1] "      Normality Src:"
## [1] "        _attribute:"
## [1] "          _class_name: RmdRsrcNode"
## [1] "          _src_name: misq1-%@distance%-%@test%.R"
## [1] "          _template: |"
## [1] "            library(MISQPlus, quietly=TRUE)"
## [1] "            source(\"misq1.params.R\")"
## [1] "            misq1 <- new(\"MISQ\", phi)"
## [1] "            sim.unit <- function(i) {"
## [1] "              S <- cbind(rnorm(data.length), rnorm(data.length) + %distance%)"
## [1] "              dist(S, misq1)"
## [1] "            }"
## [1] "            sim.data <- sapply(1:sim.size, sim.unit)"
## [1] "      Normality Test:"
## [1] "        _attribute:"
## [1] "          _class_name: RmdGeneratedNode"
## [1] "          _template: |"
## [1] "            ##### D = %distance%"
## [1] "            "
## [1] "            - $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "            - $latex S_2(t)$ is $latex N(%distance%,1)$ distributed."
## [1] "            ```{r qqnorm-misq1-%distance%, echo=FALSE}"
## [1] "            source(\"pre.R\")"
## [1] "            cache.source(\"misq1-%@distance%-%@test%.R\")"
## [1] "            test.normality(sim.data)"
## [1] "            ```"
## [1] "      "
```




## shell


mkdir build
cd build && php ../yml2rmd.php ../test/test.yml test.Rmd && cd ..

## Rmd



```
## [1] " "
## [1] ""
## [1] "# Simulation"
## [1] ""
## [1] "## $latex \\phi = (-1, 1)^T$"
## [1] ""
## [1] "### Parameters"
## [1] ""
## [1] "```{r params-misq1, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "show.source(\"misq1.params.R\")"
## [1] "```"
## [1] ""
## [1] "### Experiments"
## [1] ""
## [1] "#### Normality Test"
## [1] ""
## [1] "##### D = 1"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(1,1)$ distributed."
## [1] "```{r qqnorm-misq1-1, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance0-test0.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 1"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(1,1)$ distributed."
## [1] "```{r qqnorm-misq1-1, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance0-test1.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 1"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(1,1)$ distributed."
## [1] "```{r qqnorm-misq1-1, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance0-test2.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 10"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(10,1)$ distributed."
## [1] "```{r qqnorm-misq1-10, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance1-test0.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 10"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(10,1)$ distributed."
## [1] "```{r qqnorm-misq1-10, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance1-test1.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 10"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(10,1)$ distributed."
## [1] "```{r qqnorm-misq1-10, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance1-test2.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 100"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(100,1)$ distributed."
## [1] "```{r qqnorm-misq1-100, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance2-test0.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 100"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(100,1)$ distributed."
## [1] "```{r qqnorm-misq1-100, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance2-test1.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 100"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(100,1)$ distributed."
## [1] "```{r qqnorm-misq1-100, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance2-test2.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 1000"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(1000,1)$ distributed."
## [1] "```{r qqnorm-misq1-1000, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance3-test0.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 1000"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(1000,1)$ distributed."
## [1] "```{r qqnorm-misq1-1000, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance3-test1.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] "##### D = 1000"
## [1] ""
## [1] "- $latex S_1(t)$ is $latex N(0,1)$ distributed."
## [1] "- $latex S_2(t)$ is $latex N(1000,1)$ distributed."
## [1] "```{r qqnorm-misq1-1000, echo=FALSE}"
## [1] "source(\"pre.R\")"
## [1] "cache.source(\"misq1-distance3-test2.R\")"
## [1] "test.normality(sim.data)"
## [1] "```"
## [1] ""
```




## R src



```
## Error: object 'file_name' not found
```




