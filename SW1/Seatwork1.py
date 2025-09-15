def convert_currency(dollar):
    peso = dollar * 57.17
    yen = dollar * 146.67
    return peso, yen

usd_input = input("Enter currency in ($): ").replace(",", "")
usd_value = float(usd_input)

peso, yen = convert_currency(usd_value)

print("\nDollar($)\tPhil Peso(P)\tJpn Yen(Y)")
print(f"{usd_value:,.2f}\t{peso:,.2f}\t{yen:,.2f}")
