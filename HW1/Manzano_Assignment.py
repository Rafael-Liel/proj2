row = int(input("Enter Row: "))
col = int(input("Enter Column: "))


nestedlist = []
for x in range(row):
    print(f"\nRow {x+1}")
    innerlist = []
    for y in range(col):
        value = float(input(f" Enter number{y+1}: "))
        innerlist.append(value)
    nestedlist.append(innerlist)

print("\nThe numbers are:")
for r in nestedlist:
    for c in r:
        print(c, end=" ")
    print()

target = float(input("\nSearch for: "))
found = {"location": []}  

for i in range(row):
    for j in range(col):
        if nestedlist[i][j] == target:
            found["location"].append((i, j)) 

if found["location"]:
    print(f"\nNumber {target} found at:")
    for pos in found["location"]:
        print(f"Row {pos[0]}, Col {pos[1]}")
else:
    print(f"\n{target} not found in list")
