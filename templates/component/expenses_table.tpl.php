<table border="1">
    <tr>
        <th>
            Expense description
        </th>
        <th>
            Amount
        </th>
    </tr>

    <<<foreach|$expenses|$expense>>>
		<tr>
			<td>$$expense->description$$</td>
			<td>$$expense->amount$$</td>
		</tr>
	<<</foreach>>>
</table>