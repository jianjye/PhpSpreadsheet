<?php

// result, message, values, dates, guess

return [
    [
        '#NUM!',
        'If values and dates contain a different number of values, returns the #NUM! error value',
        [4000, -46000],
        ['2015-01-04'],
        0.1
    ],
    [
        '#NUM!',
        'Expects at least one positive cash flow and one negative cash flow; otherwise returns the #NUM! error value',
        [-4000, -46000],
        ['2015-01-04', '2019-06-27'],
        0.1
    ],
    [
        '#NUM!',
        'Expects at least one positive cash flow and one negative cash flow; otherwise returns the #NUM! error value',
        [4000, 46000],
        ['2015-01-04', '2019-06-27'],
        0.1
    ],
    [
        '#VALUE!',
        'If any number in dates is not a valid date, returns the #VALUE! error value',
        [4000, -46000],
        ['2015-01-04', '2019X06-27'],
        0.1
    ],
    [
        '#VALUE!',
        'If any entry in values is not numeric, returns the #VALUE! error value',
        ['y', -46000],
        ['2015-01-04', '2019-06-27'],
        0.1
    ],
    [
        '#NUM!',
        'If values is not an array, returns the #NUM! error value',
        -46000,
        ['2015-01-04', '2019-06-27'],
        0.1
    ],
    [
        '#NUM!',
        'If dates is not an array but values is, returns the #NUM! error value',
        [4000, -46000],
        '2015-01-04',
        0.1
    ],
    [
        '#N/A',
        'If neither dates nor values is an array, returns the #N/A error value',
        4000,
        '2015-01-04',
        0.1
    ],
    [
        0.137963527441025,
        'Dates can be in any order after all',
        [1893.67, 139947.43, 52573.25, 48849.74, 26369.16, -273029.18],
        ['2019-06-27', '2019-06-20', '2019-06-21', '2019-06-24', '2019-06-27', '2019-07-27'],
        0.1
    ],
    [
        0.77868869226873,
        'XIRR calculation #0 is incorrect',
        [4000, -46000],
        ['2015-04-01', '2019-06-27'],
        0.1
    ],
    [
        0.137963527441025,
        'XIRR calculation #1 is incorrect',
        [139947.43, 1893.67, 52573.25, 48849.74, 26369.16, -273029.18],
        ['2019-06-20', '2019-06-27', '2019-06-21', '2019-06-24', '2019-06-27', '2019-07-27'],
        0.1
    ],
    [
        0.09999999,
        'XIRR calculation #2 is incorrect',
        [100.0, -110.0],
        ['2019-06-12', '2020-06-11'],
        0.1
    ],
    [
        3235.159644,
        'XIRR calculation #3 is incorrect',
        [1.0, 1893.67, 52573.25, 48849.74, 26369.16, -273029.18],
        ['2019-06-27', '2019-06-27', '2019-06-21', '2019-06-24', '2019-06-27', '2019-07-27'],
    ],
    [
        0.15467888,
        'XIRR calculation #4 is incorrect',
        [1893.67, 139947.43, 52573.25, 48849.74, 26369.16, -273029.18],
        ['2019-06-20', '2019-06-27', '2019-06-21', '2019-06-24', '2019-06-27', '2019-07-27'],
    ],
    [
        -0.197387315,
        'XIRR calculation #5 is incorrect',
        [-100, 20, 40, 25],
        ['2010-01-01', '2010-04-01', '2010-10-01', '2011-02-01'],
    ],
    [
        3.434984565,
        'XIRR calculation #6 is incorrect',
        [-10000, 2750, 4250, 3250, 2750, 46000],
        ['2008-01-01', '2008-03-01', '2008-10-30', '2009-02-15', '2009-04-01', '2009-06-01'],
    ],
    [
        0.13796353,
        'Substitute for guess=0',
        [139947.43, 1893.67, 52573.25, 48849.74, 26369.16, -273029.18],
        ['2019-06-20', '2019-06-27', '2019-06-21', '2019-06-24', '2019-06-27', '2019-07-27'],
        0.00000
    ],
    [
        '#NUM!',
        'Can\'t find a result2 that works after FINANCIAL_MAX_ITERATIONS tries, the #NUM! error value is returned',
        [-10000, 10000, -10000, 5],
        ['2010-01-15', '2010-04-16', '2010-07-16', '2010-10-15'],
    ],
];
