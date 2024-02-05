## Inventiv-IT Coding Challenge PHP/Laravel & Vue.js application by Omar Essaouaf

The coding challenge implements the following features:
1. Ability to perform basic calculations (addition, minus, multiplication, division)
2. Ability to view calculation history

![app](https://lh3.googleusercontent.com/pw/ABLVV86ZcIQT5dYU2DOn_iEtCso50fJjThRXbwph7oqnzEw8NyXsMl6SPWFKjpLy0nz3jrWlmvjOvaN4S_6Ku0GlH7WwHcBbljMJgN1Vbk0DVrDgA4AkW_97d-isPKfnHxeM_vfwEArTmK0e-MnTsHT1kMqbEQWwNTIguAFw6U8a9IBXZuiT84naVr9PalgB7DGDUyLEEDwiW2kzgHoIE78IKri-W4LgfCNHp6VCegxGO5SrjB2PjwMLZSgu7PK5EoDTOG3cyUlzipDsCKT_H8XbGxHxTdFfbRQUxaTpj8BSQQQqQIYotg4luAix1GuCd53Gk3UAwetuh5kV7PP8aCk_5rSe6sOl892ZdO5Vtw3xAc0anrifSgBHDlNX2kZ4G1VIUdQnn1PtYnJKQ0VfTxBK4_-jc9I1gIxTWy0wDiri_9ftak_5AhA0Qs-xToDUdUjhBrrRb0_Zbhrw5dkw4f9C4B84U36zqW-lDRT9Nj7JABMPGXjkW-HVUHQq3842YAn2hhkjMcKc-zIhR7h4ng0M63Frdjd_xjwWnlEX1STVcfM2anorJr-GpfmEIDy992O5U2vP144cBe8FVIkvGaX0N9pCjudXTsqEUau3cmt785RAtZ6yLQEggVN1ChRozsl3prgo999GQWxWeC9GKmgmoyMa1H472YgtGSmuG-J23rwW-wq4vhmjDt3JcnPHaof24lpkIstloXp8q6Cyyarub5vrOcSHB9LtvmAbERks5JAV2iA78sKW7NckSHxrOh0iwdYPkck-roeaZLgSjOsfVQov6OhGkKAPqK5y55wEodj635AWW7CP9o12KS0vDrZdmXYz--eH2o3EWEyuJuZE99wqPYqeF2LH49RJYvwfab3XoHpTNbBMMV_H2175rLY5nTVhG44YCCWk7RGvyw9pWt6KRsRDgTu4QsVohBcTrsb43OOHmDQWLMuJAP-PrC4jM3QgrJdHz1MUnjpYjf308ebJli9n3qMUGrzz57SxkKjsN-h5-rZ8wKdQBSk4RqO-coCgAEbNSDvR15P40qk-97bbaL1rFj2fkvwsqSRI2TlkNrtQ3QZrGi4xMURP=w1194-h667-no?authuser=0)


-----

The codebase uses advanced code architecture to achive the wanted result such as :
- Best Practises and Coding Design principles (DRY / SOLID ..)
- Advanced design patterns **Repository Pattern, Builder Pattern, Factory Pattern, Domain driven development ...**
- Dependecy injection and container bindings
- Custom exceptions
- Invokable Controllers
- Model reflection of the table definition
- Using Pint to preset the codebase with `laravel` preset which is based on `PSR-12` for strict and well-define coding style
- Unit testing with PHPUnit

-----

### How to install & use

- Clone the project with `git clone` and navigate to the project directory
- Copy `.env.example` file to `.env`
- Create a local mysql database named **inventivit-calculator**
- **Optional step** : Edit database credentials in `.env` if you have a different database name, database user and password
- Run the setup script using `chmod +x setup.sh && ./setup.sh`
- Launch the app using `php artisan serve` or any local setup of your choice
- **Optional step** : You can ensure that the app is functional by running the test suits `php artisan test --filter=CalculatorTest`


---

That's it. Thank you for taking the time for reviewing
