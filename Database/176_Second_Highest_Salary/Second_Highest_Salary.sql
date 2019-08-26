SELECT
    IFNULL(salary AS SecondHighestSalary)
FROM
    Employee
WHERE
    salary < (SELECT
            MAX(Salary) AS Salary
        FROM
            Employee)
LIMIT 1 , 1