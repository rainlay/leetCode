SELECT
    name AS Customers
FROM
    test.customers
WHERE
    id NOT IN (SELECT DISTINCT
            (customerId)
        FROM
            orders);