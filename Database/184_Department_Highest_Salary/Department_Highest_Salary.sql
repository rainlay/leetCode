SELECT
    d.Name AS Department, e.name AS Employee, e.Salary AS Salary
FROM
    (SELECT
        MAX(Salary) AS Salary, departmentID
    FROM
        employee
    GROUP BY departmentID) t
        JOIN
    Department d ON t.departmentID = d.id
        JOIN
    employee e ON e.DepartmentId = d.id
        AND e.Salary = t.Salary