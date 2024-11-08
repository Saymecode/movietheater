import sqlite3 from 'sqlite3';
import inquirer from 'inquirer';

const db = new sqlite3.Database('./database/database.sqlite');

const findTopTheater = (date) => {
    const query = `
        SELECT theaters.name AS theater_name, SUM(daily_sales.sales) AS total_sales
        FROM daily_sales
                 JOIN theaters ON daily_sales.theater_id = theaters.id
        WHERE DATE(daily_sales.date) = ?
        GROUP BY daily_sales.theater_id
        ORDER BY total_sales DESC
            LIMIT 1
    `;

    db.get(query, [date], (err, row) => {
        if (err) {
            console.error('Error querying the database:', err);
            return;
        }

        if (!row) {
            console.log('No sales data found for the given date.');
            db.close();
            return;
        }

        const formattedSales = new Intl.NumberFormat().format(row.total_sales);

        console.log(`Top Theater for Sales on ${date}:`);
        console.log(`Theater: ${row.theater_name}`);
        console.log(`Total Sales: $${formattedSales}.00`);

        db.close();
    });
};

const promptDate = async () => {
    const answers = await inquirer.prompt([
        {
            type: 'input',
            name: 'date',
            message: 'Enter the date (in MM/D/YYYY format):',
            validate: (input) => {
                const regex = /^(0[1-9]|1[0-2])\/([1-9]|[12][0-9]|3[01])\/\d{4}$/;
                if (!input.match(regex)) {
                    return 'Please enter a valid date in MM/D/YYYY format.';
                }
                return true;
            }
        }
    ]);

    const { date } = answers;

    const [month, day, year] = date.split('/');
    const formattedDate = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;

    findTopTheater(formattedDate);
};

promptDate();
